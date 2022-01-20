FROM php:7.3-apache

RUN apt-get update -yqq && \
    apt-get install -y apt-utils zip unzip && \
    apt-get install -y nano && \
    apt-get install -y git && \
    apt-get install -y npm && \
    apt-get install -y libzip-dev && \
    a2enmod rewrite && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-configure zip && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*


    # Installation of NVM, NPM and packages
    RUN mkdir /usr/local/nvm
    ENV NVM_DIR /usr/local/nvm
    ENV NODE_VERSION 16.13.2
    ENV NVM_INSTALL_PATH $NVM_DIR/versions/node/v$NODE_VERSION
    RUN rm /bin/sh && ln -s /bin/bash /bin/sh
    RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash
    RUN source $NVM_DIR/nvm.sh \
       && nvm install $NODE_VERSION \
       && nvm alias default $NODE_VERSION \
       && nvm use default
    ENV NODE_PATH $NVM_INSTALL_PATH/lib/node_modules
    ENV PATH $NVM_INSTALL_PATH/bin:$PATH
    RUN npm -v
    RUN node -v

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY default.conf /etc/apache2/sites-enabled/000-default.conf

ARG user
ARG uid
RUN useradd -u $uid $user
RUN mkdir /home/$user/
RUN chown -R $user:$user /var/www/html
RUN chown -R $user:$user /home/$user/
USER $user

WORKDIR /var/www/app

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
