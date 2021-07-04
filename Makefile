API_DOMAIN = 127.0.0.1:8080

help: ## Show this help
	@echo "Makefile directives:\n"
	@grep '\#\#' Makefile | sed -e 's/\#\#/->/g'
	@echo ""

up: ## Runs the php container
	docker-compose up -d

down: ## Stops the php container
	docker-compose down

logs: ## Display container logs
	docker-compose logs -f php

build: ## Builds the container image
	docker-compose build

request: ## Performs a simple HTTP request to the app
	@lynx -dump http://${API_DOMAIN}/

local: ## Starts the integrated php server
	php -S ${API_DOMAIN} public/index.php
