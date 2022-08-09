
## About Project

This project was developed with Laravel 9. It tries to illustrate how to develop and deploy Laravel 
microservices with RabbitMQ messaging for inter-application communications. The following were the
steps followed to develop and deploy the docker containers.


- A new Laravel app was created: You can use :laravel new admin command or the: composer create-project laravel/laravel admin command.
- I built the Dockerfile.
- I then built the docker-compose.yaml file which contains the services the container will run.
- Install the rabbitmq docker-library from [Github](https://github.com/docker-library/rabbitmq)
- Get the server details from [CloudAMQP](https://cloudamqp.com). You can get a free tier to get started.
- Copy and paste the variables from docker-library github page into your .env file. 
- Change QUEUE_CONNECTION value to 'rabbitmq' to start use the Rabbitmq server.
- Spin up your containers using: docker-compose up. This will take several minutes depending on your internet.
- Create your Models, Controller, Migrations, factories, seeders, and jobs as in application.
- Test application with postman.



## More Information
Should you need further assistance to get this started, send me a quick email at [siawlord](mailto:siawlord@gmail.com)
