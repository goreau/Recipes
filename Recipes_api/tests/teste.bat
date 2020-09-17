@ECHO OFF
cd..
cd vendor
cd bin
cls
@ECHO ON

phpunit --configuratio arquivo.xml
