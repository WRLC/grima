FROM php:8.1-fpm

RUN apt update \
    && apt install -y libsqlite3-dev curl libxml2-dev git

# Add ssh keys from secrets
RUN ln -s /run/secrets/user_ssh_key /root/.ssh
RUN ln -s /run/secrets/gitconfig /root/.gitconfig
