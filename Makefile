API_DOMAIN = 127.0.0.1:8080

help: ## Show this help
	@echo "Makefile directives:\n"
	@grep '\#\#' Makefile | sed -e 's/\#\#/->/g'
	@echo ""

up: ## Starts the integrated php server
	php -S ${API_DOMAIN} public/index.php

request: ## Performs a simple HTTP request to the app
	@lynx -dump http://${API_DOMAIN}/
