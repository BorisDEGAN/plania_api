import { ProjectData } from '#services/DTO/project'
import ProjectHandler from '#services/project_handler'
import type { HttpContext } from '@adonisjs/core/http'

export default class TestsController {
  async test({}: HttpContext) {
    const projectHandler = new ProjectHandler(ProjectData)

    return projectHandler.generateRisksData()
  }
}
