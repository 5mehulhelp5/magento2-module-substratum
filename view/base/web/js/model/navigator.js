/**
 * Copyright © Rob Aimes - https://aimes.dev/
 * https://github.com/robaimes
 */
define([
    'ko',
    'underscore',
], function (ko, _) {
    'use strict';

    let isOnline = ko.observable(true),
        batteryLevel = ko.observable(100),
        batteryCharging = ko.observable(false);

    if ('onLine' in navigator) {
        window.addEventListener('online', () => {
            isOnline(true);
        });
        window.addEventListener('offline', () => {
            isOnline(false);
        });
    }

    if ('getBattery' in navigator) {
        navigator.getBattery().then((battery) => {
            batteryLevel(battery.level * 100);
            batteryCharging(battery.charging);

            battery.addEventListener('levelchange', () => {
                batteryLevel(battery.level);
            });
            battery.addEventListener("chargingchange", () => {
                batteryCharging(battery.charging);
            });
        });
    }

    return {
        battery: {
            charging: batteryCharging,
            level: batteryLevel,
        },
        network: {
            isOnline: isOnline,
        },
    };
});
