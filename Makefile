help: ## Show this help
	@echo "Makefile directives:\n"
	@grep '\#\#' Makefile | sed -e 's/\#\#/->/g'
	@echo ""

up: ## Starts the integrated php server
	php -S 127.0.0.1:8080 public/index.php
