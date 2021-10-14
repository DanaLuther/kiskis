# Keep it Secret, Keep it Safe
## Docker Secrets and DI

### Install composer packages:
From the src/ directory
```shell
docker run --rm -v $PWD:/app composer update
```

### Deploy without swarm
Run from the project root directory
```shell
docker-compose up -d
```
Run from the project root directory
### Remove without swarm
```shell
docker-compose down
```

### Initialize the Swarm:
Run once, from anywhere on the host
```shell
docker swarm init
```

### Leave the Swarm:
Run if you no longer wish to be in swarm mode
```shell
docker swarm leave -f
```

### Deploy or update service on a swarm
Run from the project root directory
```shell
docker stack deploy -c docker-compose.yml mytest
```
### Remove a stack from the swarm
Run from anywhere - but ensure the stack name matches
```shell
docker stack rm mytest
```

### Update a secret in the stack
From the project root directory \
Note: The file can be the same file with updated content.
```shell
docker secret create mytest_hiddenkey2.2 ./secrets/secret-key-val2.txt
docker service update --secret-rm mytest_hiddenkey2 \
       --secret-add src=mytest_hiddenkey2.2,target=hiddenkey2 \
       mytest_php
```
### List secrets
```shell
docker secret ls
```

### List containers
```shell
docker container ls
```

### Inspect a container
```shell
docker container inpect $(docker ps -lq -f name=mytest_php)
```
Looking for the mounts specifically ... 
```shell
docker container inpect $(docker ps -lq -f name=mytest_php) | grep 'Mounts' -A 10
```

### Exec into a container
```shell
docker exec -it $(docker ps -lq -f name=mytest_php) bash
```