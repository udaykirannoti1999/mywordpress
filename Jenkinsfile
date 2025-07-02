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
                    INSTANCE_ID = getInstanceId(INSTANCE_NAME, REGION)

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
                    performEC2Action(params.ACTION, INSTANCE_ID, REGION)
                }
            }
        }
    }
}

def getInstanceId(instanceName, region) {
    return sh(
        script: """
        aws ec2 describe-instances \\
            --filters "Name=tag:Name,Values=${instanceName}" "Name=instance-state-name,Values=running,stopped" \\
            --query "Reservations[*].Instances[*].InstanceId" \\
            --region ${region} \\
            --output text
        """,
        returnStdout: true
    ).trim()
}

def performEC2Action(action, instanceId, region) {
    if (action == 'start') {
        sh "aws ec2 start-instances --instance-ids ${instanceId} --region ${region}"
        echo "Start command sent to EC2 instance: ${instanceId}"
    } else if (action == 'stop') {
        sh "aws ec2 stop-instances --instance-ids ${instanceId} --region ${region}"
        echo "Stop command sent to EC2 instance: ${instanceId}"
    } else {
        error("Invalid action: ${action}")
    }
}
