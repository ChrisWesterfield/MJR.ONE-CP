cd php-profiler-extension
/usr/bin/phpize
make clean
./configure  CFLAGS="-O2 -g" --enable-tideways  --enable-shared  --with-php-config=/usr/bin/php-config
make -j `cat /proc/cpuinfo | grep processor | wc -l`
make install

