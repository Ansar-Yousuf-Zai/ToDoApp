FROM node:12.16.2-alpine as builder
WORKDIR /ng-app
COPY . .
#RUN npm config set unsafe-perm true
#RUN npm set progress=false && npm config set depth 0 && npm cache clean --force

#RUN export NODE_OPTIONS=--max_old_space_size=16384

## Storing node modules on a separate layer will prevent unnecessary npm installs at each build
#RUN npm i --no-audit && mkdir /ng-app && cp -R ./node_modules ./ng-app
RUN npm i




## Build the angular app and store the artifacts in dist folder
RUN npm run build
 
RUN ls
FROM nginx:1.14.0-alpine

## Copy our default nginx config
COPY nginx/default.conf /etc/nginx/conf.d/

## Remove default nginx website
RUN rm -rf /usr/share/nginx/html/*

## From 'builder' stage copy over the artifacts in dist folder to default nginx public folder
COPY --from=builder /ng-app/dist/angular10 /usr/share/nginx/html

CMD ["nginx", "-g", "daemon off;"]