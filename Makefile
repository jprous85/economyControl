.DEFAULT_GOAL := help
.PHONY: help

shell-back: ## -Enter_inside_of_back_shell
	docker exec -it economyControl bash

create-migration:
	@php artisan make:migration $(name)
	@echo "Migration $(name) has been created successfully"

create-migrate:
	@php artisan make:migrate
	@echo "Migrate has been executed successfully"

cache-clear:
	@php artisan cache:clear
	@echo "Cache has been cleared"

help:
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) \
	| sed -n 's/^\(.*\): \(.*\)##\(.*\)/\1\3/p' \
	| column -t  -s ' '


