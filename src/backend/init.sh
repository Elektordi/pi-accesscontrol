#!/bin/sh

cd `dirname $0`

rm -rf app/tmp

mkdir app/tmp
mkdir app/tmp/logs
mkdir app/tmp/sessions
mkdir app/tmp/cache
mkdir app/tmp/cache/views
mkdir app/tmp/cache/models
mkdir app/tmp/cache/persistent
mkdir app/tmp/tests

chmod -R a+w app/tmp

echo OK
echo Remember to copy Config/database.php.default to Config/database.php and set appropriate values.
echo Then run \"app/Console/cake schema create\" in backend directory!
