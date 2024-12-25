#!/bin/bash

set -e

composer validate --strict

composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist

composer run-script php-fixer
