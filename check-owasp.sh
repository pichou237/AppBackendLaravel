
#!/bin/bash
echo "=== Test OWASP Top 10 Checklist ==="
echo "1️⃣ Injection SQL: vérifier les paramètres des requêtes préparées."
echo "2️⃣ Authentification: vérifier absence de hard-coded credentials."
echo "3️⃣ Sensitive Data: check HTTPS et .env sécurisé."
echo "4️⃣ Accès non autorisé: middleware auth et policies."
echo "5️⃣ Mauvaise config: debug=false dans .env."
echo "6️⃣ XSS: échappement Blade actif."
echo "7️⃣ Deserialization: attention aux unserialize() PHP."
echo "8️⃣ Composants vulnérables: composer outdated / dependency-check."
echo "9️⃣ Logging: Laravel log configuré et audité."
echo "🔟 SSRF: contrôle des URLs distantes autorisées."

echo "===> Fin de checklist automatisée"
