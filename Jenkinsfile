pipeline {
    agent any

    environment {
        INSTANCE_NAME = 'jenkins server'   
        REGION = 'ap-south-1'                
        INSTANCE_ID = ''
    }

    stages {
        stage('Get Instance ID') {
            steps {
                script {
                    INSTANCE_ID = sh(
                        script: """
                        aws ec2 describe-instances \\
                            --filters "Name=tag:Name,Values=${INSTANCE_NAME}" "Name=instance-state-name,Values=running,stopped" \\
                            --query "Reservations[*].Instances[*].InstanceId" \\
                            --region ${REGION} \\
                            --output text
                        """,
                        returnStdout: true
                    ).trim()

                    if (!INSTANCE_ID) {
                        error("No EC2 instance found with Name: ${INSTANCE_NAME}")
                    }

                    echo "Instance ID found: ${INSTANCE_ID}"
                }
            }
        }

        stage('Run EC2 Action') {
            steps {
                script {
                    if (params.ACTION == 'start') {
                        sh "aws ec2 start-instances --instance-ids ${INSTANCE_ID} --region ${REGION}"
                        echo "Start command sent to EC2 instance: ${INSTANCE_ID}"
                    } else if (params.ACTION == 'stop') {
                        sh "aws ec2 stop-instances --instance-ids ${INSTANCE_ID} --region ${REGION}"
                        echo "Stop command sent to EC2 instance: ${INSTANCE_ID}"
                    } else {
                        error("Invalid action: ${params.ACTION}")
                    }
                }
            }
        }
    }
}
