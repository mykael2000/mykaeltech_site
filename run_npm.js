import { spawn } from 'child_process';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __dirname = dirname(fileURLToPath(import.meta.url));

console.log('Starting npm install in background...');
const npm = spawn('npm.cmd', ['install', '--no-audit', '--no-fund', '--loglevel', 'verbose'], {
    cwd: __dirname,
    stdio: ['ignore', 'pipe', 'pipe'],
});

let buffer = '';
npm.stdout.on('data', (d) => { buffer += d.toString(); });
npm.stderr.on('data', (d) => { buffer += d.toString(); });

npm.on('close', (code) => {
    console.log('NPM EXIT CODE:', code);
    console.log('LAST 1000 CHARS:', buffer.substring(buffer.length - 1000));
    require('fs').writeFileSync('npm_install.log', buffer);
});

npm.on('error', (e) => {
    console.log('NPM ERROR:', e.message);
});
