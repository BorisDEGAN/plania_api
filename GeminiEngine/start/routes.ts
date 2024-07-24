/*
|--------------------------------------------------------------------------
| Routes file
|--------------------------------------------------------------------------
|
| The routes file is used for defining the HTTP routes.
|
*/

const TestsController = () => import('#controllers/tests_controller')
import router from '@adonisjs/core/services/router'

router.post('/test', [TestsController, 'test'])
