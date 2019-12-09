<?php

class registry {
    private static $services = [];

    // Adds a service to the registry
    public static function addService(string $name, object $service): void {
        // Do not override service that is already in registry
        if (self::checkService($name) === false) {
            self::$services[$name] = $service;
        }
    }

    // Supplies a service from the registry
    public static function getService(string $name): object {
        // Retrieves actual object, otherwise throws an exception
        if (self::checkService($name)) {
            return self::$services[$name];
        } else {
            throw new \Exception('Unable to locate service requested');
        }
    }

    // Checks whenever service is already registered
    public static function checkService(string $name): bool {
        return array_key_exists($name, self::$services);
    }
}

