<?php
/**
 * Copyright © Rob Aimes - https://aimes.dev/
 * https://github.com/robaimes
 */

namespace Aimes\Substratum\Model;

use Composer\InstalledVersions;
use Composer\Semver\Comparator;
use Exception;
use Magento\Framework\Composer\MagentoComposerApplicationFactory;
use Magento\Framework\Serialize\Serializer\Json;

class ComposerVersion
{
    private array $packageInfo = [];

    public function __construct(
        private readonly MagentoComposerApplicationFactory $composerApplicationFactory,
        private readonly Json $json,
    ) {
    }

    /**
     * Check if a given package has an available update with the current constraints of the project
     *
     * @param string $packageName
     *
     * @return bool
     */
    public function isUpdateAvailable(string $packageName): bool
    {
        $packageInfo = $this->getPackageInfo($packageName);

        if (!$packageInfo) {
            return false;
        }

        return Comparator::greaterThan($packageInfo['latest_version'], $packageInfo['current_version']);
    }

    /**
     * @param string $packageName
     *
     * @return array|null
     */
    public function getPackageInfo(string $packageName): ?array
    {
        if (isset($this->packageInfo[$packageName])) {
            return $this->packageInfo[$packageName];
        }

        $application = $this->composerApplicationFactory->create();
        $arguments = [
            'command' => 'outdated',
            'package' => $packageName,
            '--format' => 'json',
        ];

        try {
            $composerResult = $this->json->unserialize($application->runComposerCommand($arguments));
            $currentVersion = InstalledVersions::getPrettyVersion($packageName);
            $composerResult['current_version'] = $currentVersion;

            $this->packageInfo[$packageName] = $composerResult;
        } catch (Exception) {
            return null;
        }

        return $this->packageInfo[$packageName];
    }
}
