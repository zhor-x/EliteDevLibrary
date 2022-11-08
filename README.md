<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## Install 

 ```sh 
git clone https://github.com/zhor-x/EliteDevLibrary.git 
```
 ```sh 
cd EliteDevLibrary
```

 ```sh 
docker-compose up -d
```

 ```sh 
docker exec -it app bash 
```
 ```sh
 cp .env.example .env
```
 ```sh
 composer install
```
 ```sh
 php artisan migrate --seed
```

```sh
php artisan passport:client --personal
```


```sh
open http://localhost:8000/api/documentation
```


