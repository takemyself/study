nginx做手机pc判断
=
~~~
location / {
    	if ($http_user_agent ~* (mobile|nokia|iphone|ipad|android|samsung|htc|blackberry)) {
      			rewrite ^/(.*)$ http://m.qyfw24.com/$1 permanent;    #进行正常访问的时候判断user_agent为手机，则重写至此页面
    	}
         try_files $uri $uri/ @router;
         index index.html;
    }
~~~

nginx vue页面刷新
=
~~~
location @router {
         rewrite ^.*$ /index.html last;
    }
~~~

nginx 重定向
=
~~~
if ($host ~ '^qyfw24.com'){
			return 301 http://www.qyfw24.com$request_uri;
		}
~~~

nginx 压缩解析
=
~~~
    gzip on;
    gzip_static on;
    gzip_min_length 1k;
    gzip_buffers 16 64k;
    gzip_http_version 1.1;
    gzip_comp_level 9;
    gzip_types text/plain application/x-javascript text/css application/xml text/javascript application/x-httpd-php image/jpeg image/gif image/png;
    gzip_vary on;
~~~

nginx ssl 证书配置
=
~~~
1、域名备案
2、证书申请，获取秘钥文件2个
3、服务器配置(部分)
        listen 80;
    	listen 443 ssl;
        server_name www.ssl.com;
        index index.php index.html index.htm default.php default.htm default.html;
        root 项目根目录;
        #error_page 404/404.html;
        ssl_certificate  秘钥文件地址1;
        ssl_certificate_key   秘钥文件地址2;
~~~