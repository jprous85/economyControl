.DEFAULT_GOAL := help
.PHONY: help

shell-back: ## -Enter_inside_of_back_shell
	docker exec -it economyControl bash

shell-db: ## -Enter_inside_of_database_shell
	docker exec -it economycontrol_db_1 bash

NAME_MIGRATION=$(name)
.PHONY: create-migration
create-migration: ## -Create_new_migration
	@php artisan make:migration $(name)
	@echo "Migration $(name) has been created successfully"

NAME_SEEDER=$(name)
.PHONY: create-seeder
create-seeder: ## -Create_new_seeder
	@php artisan make:seeder $(name)
	@echo "Seeder $(name) has been created successfully"

migrate: ## -Generate_migrations_and_run_seeders
	@php artisan migrate
	@php artisan db:seed
	@echo "Migrate has been executed successfully"

cache-clear: ## -Clean_cache
	@php artisan cache:clear
	@echo "Cache has been cleared"

crypt-env: ## -Crypt_env_file
	@php vendor/programandoconcabeza/env-management/crypt.php

decrypt-env: ## -Decrypt_env_file
	@php vendor/programandoconcabeza/env-management/decrypt.php

queue: ## -work-queue
	@php artisan queue:work
	@echo "Queues are working"

help:
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) \
	| sed -n 's/^\(.*\): \(.*\)##\(.*\)/\1\3/p' \
	| column -t  -s ' '


