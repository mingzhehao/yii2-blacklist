#!/bin/sh
sed -i "s/https:\/\/fonts.googleapis.com/http:\/\/fonts.css.network/g" `find ./vendor -type f -name "*.css"`
sed -i "s/https:\/\/fonts.googleapis.com/http:\/\/fonts.css.network/g" `find ./vendor -type f -name "*.less"`

sed -i "s/http:\/\/fonts.useso.com/https:\/\/fonts.css.network/g" `find ./vendor -type f -name "*.css"`
sed -i "s/http:\/\/fonts.useso.com/https:\/\/fonts.css.network/g" `find ./vendor -type f -name "*.less"`
