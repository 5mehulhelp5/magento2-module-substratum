/**
 * Copyright © Rob Aimes - https://aimes.dev/
 * https://github.com/robaimes
 */
define([
    'Magento_Ui/js/lib/collapsible',
    'mageUtils',
    'mage/translate',
    'underscore',
], function(Collapsible, utils, $t, _) {
    'use strict';

    return Collapsible.extend({
        defaults: {
            template: 'Aimes_Substratum/collapsible',
            title: $t('View More'),
        },

        initConfig: function () {
            this._super();

            _.extend(this, {
                uid: utils.uniqueid(),
            });

            return this;
        },
    });
});
