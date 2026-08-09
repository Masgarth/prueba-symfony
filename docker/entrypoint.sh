#!/bin/bash

set -e

echo "======================================"
echo "Ejecutando migraciones de Doctrine..."
echo "======================================"

php bin/console doctrine:migrations:migrate --no-interaction

echo ""
echo "======================================"
echo "Corrigiendo permisos de Symfony..."
echo "======================================"

chown -R www-data:www-data /var/www/html/var

echo ""
echo "======================================"
echo "Iniciando Apache..."
echo "======================================"

exec apache2-foreground