.PHONY: build
build:
	docker-compose build
.PHONY: up
up:
	docker-compose up
.PHONY: upd
upd:
	docker-compose up -d
.PHONY: exec
exec:
	docker-compose exec todo-app /bin/bash
.PHONY: down
down:
	docker-compose down
