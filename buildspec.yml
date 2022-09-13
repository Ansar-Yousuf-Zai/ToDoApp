version: 0.2
phases:
  pre_build:
    commands:
      - echo Logging into amazon ecr
      - aws ecr get-login-password --region eu-central-1 | docker login --username AWS --password-stdin 995105043624.dkr.ecr.eu-central-1.amazonaws.com/we_travel_app

  build:
    commands:
      - echo Build started on `date`
      - echo Building docker images
      - docker build -t  web:1 .
      - docker tag web:1 995105043624.dkr.ecr.eu-central-1.amazonaws.com/we_travel_app:latest
      - docker tag web:1 995105043624.dkr.ecr.eu-central-1.amazonaws.com/we_travel_app:$CODEBUILD_BUILD_NUMBER
      - docker images 
  post_build:
    commands:
      - echo Build completed on `date`
      - echo Pushind docker images
      - docker push 995105043624.dkr.ecr.eu-central-1.amazonaws.com/we_travel_app:latest
      - docker push 995105043624.dkr.ecr.eu-central-1.amazonaws.com/we_travel_app:$CODEBUILD_BUILD_NUMBER


# version: 0.2
# phases:
#  install: # Install AWS cli, kubectl (needed for Helm) and Helm
#   commands:
#    — echo Set parameter
#    — REGION=eu-central-1
#    — AWS_ACCOUNTID=995105043624
#    — ECR_NAME=we_travel_app
#    — COMMIT_HASH=$(echo $CODEBUILD_RESOLVED_SOURCE_VERSION | cut -c 1–7)
#    — IMAGE_TAG=${COMMIT_HASH:=latest}
#    — EKS_NAME=demo2
#    — DEPLOYMENT_NAME=wetravel
#    -REPOSITORY_URI=${AWS_ACCOUNTID}.dkr.ecr.${REGION}.amazonaws.com/${ECR_NAME}
#    - echo Logging to AWS ECR…
#    — aws ecr get-login-password — region $REGION | docker login — username AWS — password-stdin ${AWS_ACCOUNTID}.dkr.ecr.${REGION}.amazonaws.com
#    - echo Installing necessary library…
#    — apt-get update
#    — apt install -y awscli git python3
#    —  curl -o aws-iam-authenticator https://amazon-eks.s3.us-west-2.amazonaws.com/1.21.2/2021-07-05/bin/linux/amd64/aws-iam-authenticator
#    — chmod +x ./aws-iam-authenticator
#    — mkdir -p /bin && cp ./aws-iam-authenticator ~/bin/aws-iam-authenticator && export PATH=/bin:$PATH
#    — curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl
#    — chmod +x kubectl
#    — mv ./kubectl /usr/local/bin/kubectl
 
#    — curl -fsSL -o get_helm.sh https://raw.githubusercontent.com/helm/helm/master/scripts/get-helm-3
#    — chmod 700 get_helm.sh
#    — ./get_helm.sh
#  pre_build: # Add kubeconfig to access to EKS cluster
#   commands:
#    — echo Update kubeconfig…
#    — aws eks update-kubeconfig — name ${EKS_NAME} — region ${REGION}
#    — kubectl version
#  build: # Build Docker image and tag it with the commit sha
#   commands:
#    — echo Building docker image…
#    — docker build -t $REPOSITORY_URI:latest — file Dockerfile .
#    — docker tag $REPOSITORY_URI:latest $REPOSITORY_URI:$IMAGE_TAG
#  post_build: # Push the Docker image to the ECR
#    - docker push $REPOSITORY_URI:latest
#    - docker push $REPOSITORY_URI:$CODEBUILD_BUILD_NUMBER

