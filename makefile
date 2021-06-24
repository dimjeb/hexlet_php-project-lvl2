lint:
	composer exec --verbose phpcs -- --standard=PSR12 bin
validate:
	composer validate
push:
	git add .
	git commit -m $desc
	git push
