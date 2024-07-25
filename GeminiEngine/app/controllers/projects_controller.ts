import ProjectHandler from '#services/project_handler'
import type { HttpContext } from '@adonisjs/core/http'

export default class ProjectsController {
  async process({ request }: HttpContext) {
    const projectHandler = new ProjectHandler(request.input('project'))

    return {
      genre_equality: JSON.parse(await projectHandler.generateGenreEqualityData()),
      risks: JSON.parse(await projectHandler.generateRisksData()),
      environment: JSON.parse(await projectHandler.generateEnvironmentData()),
      partners_reinforcement: JSON.parse(await projectHandler.generatePartnersReinforcementData()),
      // budget: JSON.parse(await projectHandler.refactorBudget()),
      // calendar: await projectHandler.refactorCalendar(),
    }
  }
}
