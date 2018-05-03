#!/bin/sh

# Setup variables
DATE=$(date +%Y-%m-%d.%H:%M:%S)
FILE=customfilenamewithdate_${DATE}.sql
DBSERVER=127.0.0.1
DATABASE=dbname
USER=dbusername
PASS=dbpassword

# Optionally remove previous file
#unalias rm     2> /dev/null
#rm ${FILE}     2> /dev/null
#rm ${FILE}.gz  2> /dev/null

# Add these additional flags for remote hosts
# --protocol=TCP --host=${DBSERVER}

# Use this command for a database server on localhost. add other options if need be.
mysqldump --opt --user=${USER} --password=${PASS} ${DATABASE} > ${FILE}

# Zip the file
gzip $FILE