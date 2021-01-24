FROM klakegg/hugo:ext-ubuntu AS build
COPY ./ /src
RUN echo 'baseURL = "https://course.larget.fr/"'>> config.toml
RUN hugo
FROM httpd:2.4 AS run
COPY --from=build /src/public/ /usr/local/apache2/htdocs/