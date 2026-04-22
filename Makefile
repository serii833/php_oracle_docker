.PHONY: dev stop logs

dev:
	docker compose up

stop:
	docker compose down

logs:
	docker compose logs -f app
