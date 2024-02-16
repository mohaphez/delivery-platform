FROM  ghcr.io/mohaphez/php82:latest
COPY --chown=www-data:www-data . .
USER root
RUN rm -rf .git .env .github docker deploy
RUN chmod -R ug+rwx storage bootstrap/cache
