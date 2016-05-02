# yii2 + postgresql test task
Vagrant run
-----------
```
> vagrant up
```
Wait for provisioning...
```
> vagrant ssh
vagrant$ cd /vagrant
vagrant$ composer install
vagrant$ php app/yii migrate
vagrant$ php app/yii faker/generate \
  --count=1000000 --dbprovider=YiiDAO \
  generator_template=users dbprovider_table=users dbprovider_truncate=1
```
Fake data generation can take up to 1h

After fake data loaded, go http://localhost:8000/
