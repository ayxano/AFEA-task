# AFEA Task

Instructions:
1) Clone project
2) Copy `env` file to `.env` using this command : `cp env .env` All config should be set on .env file.
3) Build app image with docker compose: `sudo docker-compose build app`
4) Run docker compose: `sudo docker-compose up -d`
5) Switch to app container: `sudo docker-compose exec app bash`
5.1) Then install packages with composer inside the container: `composer install`
5.2) Then migrate to DB inside container: `php spark migrate`

Project documentation:
1) Navigate to `http://localhost:8080/` from your web browser.
2) Simply create a new user using registration link on the project after above instructions.
3) Then use the credentials to login the system.
4) After logging in, you can add and manage your posts.