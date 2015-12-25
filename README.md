# freeShadowsocks
获取免费的shadowsocks 

###http://www.ishadowsocks.com/###
版本要求:
	php > 5.3
#如何配置  

1  远程登录到自己的vps  
2  cd xx //xx 目录为www 目录  
3  git clone https://github.com/osdebianly/freeShadowsocks.git  

如何使用  
windows:  
	 	浏览器打开 ： http://your_vps_ip/freeShadowsocks/index.php  保存到本地shadowsocks应用 同级目录   

Ubuntu  
	使用ss-local -c //config_local_path 启动  
	wget -O config_local_path http://your_vps_ip/freeShadowsocks/jp.php    //获取日本免费配置，推荐速度最快  
	
	wget -O config_local_path http://your_vps_ip/freeShadowsocks/hk.php    //获取香港免费配置  

	wget -O config_local_path http://your_vps_ip/freeShadowsocks/hk.php    //获取美国免费配置  



