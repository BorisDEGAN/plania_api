import ProjectHandler from '#services/project_handler'
import type { HttpContext } from '@adonisjs/core/http'

export default class ProjectsController {
  async process({ request }: HttpContext) {
    const projectHandler = new ProjectHandler(request.input('project'))

    return {
      overview: await projectHandler.refactorOverview(),
      context: await projectHandler.refactorContext(),
      justification: await projectHandler.refactorJustification(),
      genre_equality: JSON.parse(await projectHandler.generateGenreEqualityData()),
      risks: JSON.parse(await projectHandler.generateRisksData()),
      environment: JSON.parse(await projectHandler.generateEnvironmentData()),
      partners_reinforcement: JSON.parse(await projectHandler.generatePartnersReinforcementData()),
      outter_strategies: JSON.parse(await projectHandler.generateOutterStrategiesData()),
      // budget_plan: JSON.parse(await projectHandler.refactorBudget()),
      // calendar: await projectHandler.refactorCalendar(),
    }
  }
}
