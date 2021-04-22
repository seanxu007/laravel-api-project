# Library choice
I choice laravel sail to init my docker containers since it is fast to create all related services;
I use laravel sanctum to create a simple auth for mobile application;
I use php unit test for basic feature test;

# Frontend application advice
This is depends on the requirements. Easiest way for me is to create a Next.js project which will call this laravel api project using bearer token.

# TODO
1. Add more unit tests and intergation tests, feature test add function before all test cases;
2. Create different .env and docker-compose.yml for different environment (testing and production);
3. Add other features (ServiceProvider, Event, Observer, queue...) according to requirements