FROM mysql:8

COPY .env .
COPY ./create_database.sql /docker-entrypoint-initdb.d

ENTRYPOINT ["docker-entrypoint.sh"]

EXPOSE 3306 33060
CMD ["mysqld","--default-authentication-plugin=mysql_native_password"]

