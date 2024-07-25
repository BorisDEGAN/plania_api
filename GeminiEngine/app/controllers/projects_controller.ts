import ProjectHandler from '#services/project_handler'
import type { HttpContext } from '@adonisjs/core/http'

export default class ProjectsController {
  async process({ request }: HttpContext) {
    const projectHandler = new ProjectHandler(request.input('project'))

    return {
      genreEquity: await projectHandler.generateGenreEqualityData(),
      risks: await projectHandler.generateRisksData(),
    }
  }
}
