PROJECTS := $(shell docker images | grep projects | awk '{print $$3}')

.PHONY: help dev staging prod down-dev list-dev delete-image
help: ## Mostrar esta ayuda
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'
dev: ## Desplegar el entorno de desarrollo
	docker compose -f develop.yml up -d --build

staging: ## Desplegar el entorno de staging
	docker compose -f staging.yml up -d --build

prod: ## Desplegar el entorno de producción
	docker compose -f prod.yml up -d --build

down-dev: ## Derribar todos los entornos
	docker compose -f develop.yml down

list-dev: ## Listar contenedores del entorno de desarrollo
	docker compose -f develop.yml ps

delete-image: ## Eliminar imágenes de proyectos
	@if [ -z "$(PROJECTS)" ]; then \
		echo "No hay imágenes de proyectos para eliminar."; \
	else \
		docker rmi -f $(PROJECTS); \
	fi
	@