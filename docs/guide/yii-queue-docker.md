# Yii Queue Listener in Docker

Docker build for this demo support for [yii-queue listener](https://github.com/yiisoft/yii-queue/blob/master/docs/guide/worker.md#supervisor) (off by default), you need to enable it by open the docker build file.

file: `Dockerfile`

from this:

	# copy yii-queue config
	#COPY docker/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/yii-queue.conf

to this:

	# copy yii-queue config
	COPY docker/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/yii-queue.conf

and you can rebuild the container again:

	docker compose build --no-cache && docker compose up -d 