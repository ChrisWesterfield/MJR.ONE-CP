cd nginx-1.9.11

make clean

./configure \
  --prefix=/usr/share/nginx \
  --sbin-path=/usr/sbin/nginx \
  --conf-path=/etc/nginx/nginx.conf \
  --pid-path=/var/run/nginx.pid \
  --lock-path=/var/lock/nginx.lock \
  --error-log-path=/var/log/nginx/error.log \
  --http-log-path=/var/log/access.log \
  --user=www-data \
  --group=www-data \
  --build=MJR.ONE-NGINX \
  --with-threads \
  --with-file-aio \
  --with-ipv6 \
  --with-http_realip_module \
  --with-http_xslt_module \
  --with-http_geoip_module \
  --with-http_dav_module \
  --with-http_flv_module \
  --with-http_mp4_module \
  --with-http_gunzip_module \
  --with-http_secure_link_module \
  --with-http_random_index_module \
  --with-http_auth_request_module \
  --with-http_stub_status_module \
  --with-http_perl_module \
  --with-mail=dynamic \
  --with-mail_ssl_module \
  --with-stream=dynamic \
  --with-stream_ssl_module \
  --with-google_perftools_module \
  --with-pcre \
  --add-module=/usr/src/nginx/headers-more-nginx-module \
  --add-module=/usr/src/nginx/naxsi/naxsi_src \
  --add-module=/usr/src/nginx/nginx-auth-ldap \
  --add-module=/usr/src/nginx/nginx-module-vts \
  --add-module=/usr/src/nginx/nginx-upload-progress-module \
  --add-module=/usr/src/nginx/ngx_http_accounting_module \
  --with-http_ssl_module \
  --with-http_v2_module \
  --add-module=/usr/src/nginx/ngx_pagespeed

make -j `cat /proc/cpuinfo | grep processor | wc -l`

make install

