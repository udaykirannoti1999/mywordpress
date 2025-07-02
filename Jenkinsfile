pipeline {
    agent any
  
     parameters {
        choice(name: 'ACTION', choices: ['start', 'stop'], description: 'Choose EC2 action')
     }
    stages {
        stage('Run EC2 Action') {
            steps {
                script {
                    if (params.ACTION == 'start') {
                        sh "aws ec2 start-instances --instance-ids $INSTANCE_ID --region $AWS_REGION"
                    } else if (params.ACTION == 'stop') {
                        sh "aws ec2 stop-instances --instance-ids $INSTANCE_ID --region $AWS_REGION"
                    } else {
                        error("Invalid action: ${params.ACTION}")
                    }
                }
            }
        }
    }
}
