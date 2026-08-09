#!/bin/bash
set -e

echo "======================================"
echo "Ejecutando migraciones de Doctrine..."
echo "======================================"

php bin/console doctrine:migrations:migrate --no-interaction

echo "======================================"
echo "Migraciones completadas."
echo "Iniciando Apache..."
echo "======================================"

exec apache2-foreground