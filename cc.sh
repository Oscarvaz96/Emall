#!/bin/sh
cd bin
sudo php magento cache:clean
sudo php magento cache:flush
cd ..
cd ..
ls -lrt
