FROM dunglas/frankenphp

# Copy project files to the container
COPY . /app/public

WORKDIR /app
