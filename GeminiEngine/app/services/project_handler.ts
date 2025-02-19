import {
  communicationPlanStructure,
  ContextStructure,
  environmentStructure,
  genreEquityStructure,
  GestionStrategyStructure,
  JustificationStructure,
  partnersReinforcementStructure,
  risksStructure,
} from './DTO/generated_sections.js'
// import { ProjectData } from './DTO/project.js'
import { gemini } from './gemini.js'

export default class ProjectHandler {
  projectData: any
  chat: any
  constructor(ProjectData: any) {
    this.projectData = ProjectData
    this.chat = gemini.startChat({
      history: [
        {
          role: 'user',
          parts: [
            { text: 'Tu es un expert de la gestion du projet et de la rédaction' },
            {
              text:
                "Considérant les données d'un projet suivant : " + JSON.stringify(this.projectData),
            },
          ],
        },
      ],
    })
  }

  async generate(text: string) {
    const result = await gemini.generateContent(text)
    const response = result.response
    return response.text()
  }
  async generateGenreEqualityData() {
    const prompt =
      "Génère des stratégies de maintient d'équité du genre. Fais des paraches concis et claires. Tu utiliseras la structure suivante " +
      JSON.stringify(genreEquityStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async generateRisksData() {
    const prompt =
      'En prenant en compte le contexte et les réalités éventutelles du projet, génère des stratégies de gestion de risque en précisant pour chaque stratégie, le risque indexé et le niveau de risque. Fais des paragraphes concis et clairs. Tu utiliseras la structure suivante ' +
      JSON.stringify(risksStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async generateEnvironmentData() {
    const prompt =
      "En prenant en compte le contexte et les réalités éventutelles du projet, génère des stratégies de préservation de l'environnement. Fais des paragraphes concis et clairs. Tu utiliseras la structure suivante " +
      JSON.stringify(environmentStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async generatePartnersReinforcementData() {
    const prompt =
      'En prenant en compte le contexte et les réalités éventutelles du projet, génère des stratégies de renforcement des capacités des différents acteurs afin que ces acteurs puissent gérer le projet. Tu prendras en compte tous les acteurs du projet qui ont un role executif. Fais des paragraphes concis et clairs. Tu utiliseras la structure suivante ' +
      JSON.stringify(partnersReinforcementStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async generateOutterStrategiesData() {
    const prompt =
      'En prenant en compte les données du projet et les réalités éventutelles du projet, génère des stratégies de renforcement des capacités des différents acteurs afin que ces acteurs puissent maintenir le projet meme après sa fin. Tu prendras en compte principalement les bénificiares du projet. Fais des paragraphes concis et clairs. Tu utiliseras la structure suivante ' +
      JSON.stringify(partnersReinforcementStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async refactorBudget() {
    const newBudget = this.projectData?.new_budget ?? 1042600000
    const prompt =
      'Met à jour le budget du projet en prenant en compte le nouveau budget : ' +
      newBudget +
      " et les couts que pourraient engendrer la mise en place des stratégies générées. Tu garderas la meme structure pour le nouveau budget que l'ancien : " +
      JSON.stringify(this.projectData.budget) +
      'Tu suivra la structure du budget suivante :' +
      this.projectData.budget_plan
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async refactorCalendar() {
    const newDuration = this.projectData?.new_duration ?? 300
    const prompt =
      'Met à jour le calendrier des activités du projet en prenant en compte le nouveau temps alloué : ' +
      newDuration +
      " et la mise en place des stratégies générées. Tu garderas la meme structure pour le nouveau calendrier que l'ancien : " +
      JSON.stringify(this.projectData.calendar)
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async refactorOverview() {
    const prompt =
      'Reformule le résumé executif du projet : ' +
      this.projectData.overview +
      'Tu utiliseras la structure suivante ' +
      JSON.stringify(JustificationStructure)
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return JSON.parse(response.text()).justification
  }

  async refactorContext() {
    const prompt =
      'Reformule le contexte du projet : ' +
      this.projectData.context +
      'Tu utiliseras la structure suivante ' +
      JSON.stringify(ContextStructure)
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return JSON.parse(response.text())?.context
  }

  async refactorJustification() {
    const prompt =
      'Reformule la justification du projet : ' +
      this.projectData.context +
      'Tu utiliseras la structure suivante ' +
      JSON.stringify(JustificationStructure)
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return JSON.parse(response.text())?.justification
  }

  async generateGestionStrategy() {
    const prompt =
      'En prenant en compte les différents partenaires et parties prenantes, etablie une strategie de gestion globale du projet. Tu feras des paragraphes concis et clairs en suivant la structure suivante ' +
      JSON.stringify(GestionStrategyStructure)
    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return JSON.parse(response.text())?.strategy
  }
  async generateCommunicationPlan() {
    const prompt =
      'En prenant en compte les données des parties prenantes du projet: ' +
      this.projectData.partners +
      ", génère une stratégie de communication entre ces acteurs du projet. Tu noteras qu'il s'agit essantiellement d'un planning de reunions. Tu utiliseras la structure suivante:  " +
      JSON.stringify(communicationPlanStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }
}
