#!/usr/bin/env bash

cp ./backend/.env.example ./backend/.env

cd ./docker && 
    cp env-example .env &&
    sudo docker-compose up -d nginx workspace mysql &&
    sudo docker-compose run --rm workspace sh ./deploy.sh