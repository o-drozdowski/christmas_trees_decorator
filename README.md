## About project
This is a Christmass Tree generator. It creates and decorates trees with different types of ornaments and calculates price for them.

### Run project
To run up project, use: 
```
docker composer up --build
```
Dockerfile is set to run 
```
CMD bash -c "composer install && php ./index.php"
```
which will install composer within the container and than run `index.php`