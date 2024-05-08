// Importer startStimulusApp après sa déclaration
import { startStimulusApp } from '@symfony/stimulus-bridge';

// Déclarer la constante app après l'importation
const app = startStimulusApp();

// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    './controllers',
    true,
    /\.(j|t)sx?$/
));
