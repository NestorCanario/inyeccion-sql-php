FROM php:8.2-cli
#FROM php:8.3-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN apt update 
RUN apt-get install openssh-server -y
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/g' /etc/ssh/sshd_config 
RUN sed -i 's/#PermitEmptyPasswords no/PermitEmptyPasswords yes/g' /etc/ssh/sshd_config
RUN yes abc123zxy | passwd root

CMD [ "php", "-S", "0.0.0.0:80", "-t", "./" ]
